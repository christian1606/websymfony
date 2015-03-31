<?php

namespace HB\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class userType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label'=>'Nom', 'max_length'=>'80' ))
            ->add('email', 'repeated', array(
                'type'=>'email',
                'invalid_message'=>'Les adresses mails doivent correspondrent.',
                'options'=>array('required'=>true),
                'first_options'=>array('label'=>'Email'),
                'second_options'=>array('label'=>'Confirmation Email'),
              ))
            ->add('login')
            //->add('password', 'password')
            ->add('password', 'repeated', array(
                'type'=>'password',
                'invalid_message'=>'Les mots de passe doivent correspondrent.',
                'options'=>array('required'=>true),
                'first_options'=>array('label'=>'Mot de passe'),
                'second_options'=>array('label'=>'Confirmation mot de passe'),
              ))    
                
            ->add('birthDate', 'birthday', array('label'=>'Date de naissance'))
                //OU ->add('birthDate', 'datetime', array('years'=>range((date'Y')-20, date('Y')) )
            //->add('creationDate')
            //->add('lastEditTime')
                //ne coche pas la check box
            ->add('enabled', 'checkbox' , array('label'=>'Actif'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HB\BlogBundle\Entity\user'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hb_blogbundle_user';
    }
}
