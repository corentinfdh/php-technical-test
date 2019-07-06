<?php

namespace App\Form;

use App\Entity\ExitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RunningOutingType
 * @package App\Form
 */
class RunningOutingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('exitType', EntityType::class, [
                'class' => ExitType::class,
                'choice_label' => 'type',
                'required' => true,
            ])
            ->add('date', DateTimeType::class, ['required' => true])
            ->add('duration', TimeType::class, ['required' => true])
            ->add('distance', NumberType::class, ['required' => true])
            ->add('comment', TextareaType::class, ['required' => false])
        ;
    }
}