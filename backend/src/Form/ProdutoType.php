<?php

namespace App\Form;

use App\Entity\Produto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{ TextType,IntegerType,MoneyType };
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome',TextType::class, [
                'help' => "Preencher o Nome",
            ])
            ->add('tipo',TextType::class, [
                'help' => "Preencher o Tipo",
            ])
            ->add('peso',IntegerType::class, [
                'help' => "Preencher o Peso",
            ])
            ->add('quantidade',IntegerType::class, [
                'help' => "Preencher a Quantidade",
            ])
            ->add('preco',MoneyType::class, [
                'label' => "Preencher o preço $",
                'currency' => 'BR'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produto::class,
        ]);
    }
}
