<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label'=> false,
                'attr'=> [
                    'class'=>'form-control',
                    'required'=>true,
                    'placeholder'=>'Votre Adresse Email'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label'=>false,
                'attr'=> [
                    'class'=>'form-control',
                    'placeholder'=>'Votre Adresse',
                    'max'=> '50'
                ]
            ])
            ->add('telephone', IntegerType::class, [
                'label'=> false,
                'attr'=> [
                    'class'=>'form-control',
                    'required'=>true,
                    'placeholder'=>'Votre Numéro de Telephone',
                    'max'=> 13,
                ]
            ])
            ->add('fullname', TextType::class, [
                'label'=> false,
                'attr'=> [
                    'class'=>'form-control',
                    'required'=>true,
                    'placeholder'=>'Votre Nom Complet',
                    'max'=> 30,
                ]
            ])
            
            ->add('role', EntityType::class, [
                'label'=> false,
                'empty_data'=>'ROLE_USER',
                'class'=> Role::class,
                'choice_label'=> 'description',
                'choice_value'=>'role_name',
                'attr'=> [
                    'class'=> 'form-control',
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                'label'=> false,
                'mapped' => false,
                'attr' => [
                            'autocomplete' => 'new-password',
                            'class'=>'form-control',
                            'required'=>true,
                            'placeholder'=>'Votre Mot  de Passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Le mot de passe doit avoir au moins {{ limit }} caracteres',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
