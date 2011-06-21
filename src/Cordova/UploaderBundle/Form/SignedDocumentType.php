<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 2:26 AM
 *
 */

namespace Cordova\UploaderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * SignedDocumentType.
 *
 * @author Luis Cordova
 */
class SignedDocumentType extends AbstractType
{
    /**
     * Builds the form.
     *
     * @param FormBuilder $builder The builder
     * @param array $options The options
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('filename', 'text', array( 'label' => 'File Name :'));
        $builder->add('attachment', 'file');
    }

    /**
     * Gets the default options for the form
     *
     * @param array $options The options
     * @return type The options array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Cordova\UploaderBundle\Entity\SignedDocument'
        );
    }
}
