<?php

namespace FrontBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvents;


class ListeservicesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',EntityType::class, array(
            'class'=>'FrontBundle\Entity\Listeservices',
            'choice_label'=>'nom',
            'label'=>'Services :',
            'attr'=>array('class'=>'listeservice')

        ))->add('prixparheureaffiche',\Symfony\Component\Form\Extension\Core\Type\TextType::class
            ,array('attr'=>array('disabled'=>'disabled','hidden'=>'hidden')));
        $builder->get('nom')->addEventListener(FormEvents::SUBMIT, [$this, 'addCities']);
}

    public function addCities(FormEvent $event)
    {
        $form = $event->getForm()->getParent(); // modify the **parent** form
        // during SUBMIT event, ->getData() actually is the resolved object
        $data = $event->getData();
        if (empty($data)) {
            return;
        }
        $form->add('prixparheureaffiche', 'choice', [
            'choice_label' => 'prixparheureaffiche',
            'choice_value' => 'id',
            'choices_as_values' => true,
            'choices' => $data->getPrixparheureaffiche()

        ])->add('save',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontBundle\Entity\Listeservices'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontbundle_listeservices';
    }


}
