<?php

namespace App\Form;

use App\Entity\Employees;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule',IntegerType::class,['attr'=>array('placeholder'=> 'أدخل الرقم الترتيبي'),'label'=>false,'required'=>false,])
            ->add('nom',TextType::class,['attr'=>array('placeholder'=> 'أدخل اللقب'),'label'=>false,'required'=>false,])
            ->add('prenom',TextType::class,['attr'=>array('placeholder'=> 'أدخل الإسم'),'label'=>false,'required'=>false,])
            ->add('plan',TextType::class,['attr'=>array('placeholder'=> 'أدخل الخطة'),'label'=>false,'required'=>false,])
            ->add('date_break',TextType::class,['attr'=>array('placeholder'=> 'أدخل تاريخ الراحة الاسبوعية'),'label'=>false,'required'=>false,])
            ->add('date_Eid',TextType::class,['attr'=>array('placeholder'=> 'أدخل تاريخ العيد الرسمي',),'label'=>false,'required'=>false,])
            ->add('travauxFaits',TextType::class,['attr'=>array('placeholder'=> 'أدخل الاعمال المنجزة'),'label'=>false,'required'=>false,])
            ->add('dateTravaux',TextType::class,['attr'=>array('placeholder'=> 'أدخل أيام الاعمال إضافية'),'label'=>false,'required'=>false,])
            ->add('adresseTravaux',TextType::class,['attr'=>array('placeholder'=> 'أدخل عنوان الاعمال إضافية'),'label'=>false,'required'=>false,])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employees::class,
        ]);
    }
}
