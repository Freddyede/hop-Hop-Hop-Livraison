<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',null,[
                'attr'=>[
                    'class'=>'form-control mb-3 text-center',
                    'placeholder'=>'Email'
                ]
            ])
            ->add('username', TextType::class,[
                'attr'=>[
                    'class'=>'form-control mb-3 text-center',
                    'placeholder'=>'Username'
                ]
            ])
            ->add('phone', NumberType::class,[
                'attr'=>[
                    'class'=>'form-control mb-3 text-center',
                    'placeholder'=>'Phone'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr'=>[
                    'class'=>'form-control mb-3 text-center',
                    'placeholder'=>'Password'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
