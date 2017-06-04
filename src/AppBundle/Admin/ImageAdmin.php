<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ImageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text', [
            'label' => 'Tytuł'
        ]);
        $formMapper->add('imageFile', 'file', [
            'label' => 'Plik'
        ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id');
        $listMapper->addIdentifier('title');
        $listMapper->add('imageName');
        $listMapper->add('imageSize');
        $listMapper->add('_action', null, [
            'actions' => [
                'edit' => [],
                'delete' => [],
            ]
        ]);
    }

    public function toString($object)
    {
        return $object->getTitle();
    }
}
