<?php
// src/Digger/ObjectsBundle/Form/Type/ObjectType.php

namespace Digger\ObjectsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
#use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;


class ObjectType extends AbstractType
{
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('info', 'textarea');
       # $builder->add('recaptcha', 'ewz_recaptcha');
	   
        $builder->add('cat', 'choice', array(
                'choices'   =>  array(  '' => '',
                                         1 => 'ПАРИ',
                                         2 => 'СЕКС',
                                         3 => 'СПОРТ',
                                         4 => 'РАБОТА' ,
                                         5 => 'ЛЮБОВ',
                                         6 => 'УЧЕНЕ' ,
                                         7 => 'ИГРИ',
                                         8 => 'КУПОН',
                                         9 => 'СЕМЕЙСТВО' ,
                                         99 => 'РАЗНИ'  ),
                'required'  => true));

    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Digger\RecordbgBundle\Entity\Objects',
        );
    }

    public function getName()
    {
        return 'object';
    }
}

?>