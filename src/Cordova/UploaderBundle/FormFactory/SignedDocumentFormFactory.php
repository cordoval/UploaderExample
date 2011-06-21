<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 1:40 AM
 *
 */

namespace Cordova\UploaderBundle\FormFactory;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;
use Cordova\UploaderBundle\FormFactory\FormFactoryInterface;

/**
 * SignedDocumentFormFactory.
 *
 * @author Luis Cordova
 */
class SignedDocumentFormFactory implements FormFactoryInterface
{
    /**
     * @var FormFactory $formFactory
     */
    protected $formFactory;

    /**
     * @var string $type
     */
    protected $type;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var array $options
     */
    protected $options;

    /**
     * Constructs a new instance of SignedDocumentFormFactory.
     *
     * @param FormContext $formContext The form context
     * @param string $type The type
     * @param string $name The name
     * @param array $options The builder options
     */
    public function __construct(FormFactory $formFactory, $type, $name, array $options = null)
    {
        if (null === $options) {
            $options = array();
        }

        $this->formFactory = $formFactory;
        $this->type = $type;
        $this->name = $name;
        $this->options = $options;
    }

    /**
     * Creates a new form.
     *
     * @param mixed The form data
     * @return Form A form
     */
    public function createForm($data = null)
    {
        $builder = $this->formFactory->createNamedBuilder(
            $this->type,
            $this->name,
            $data,
            $this->options
        );

        return $builder->getForm();
    }
}
