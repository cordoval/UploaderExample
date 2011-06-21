<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 1:36 AM
 *
 */

namespace Cordova\UploaderBundle\FormFactory;

/**
 * FormFactoryInterface.
 *
 * @author Luis Cordova
 */
interface FormFactoryInterface
{
    /**
     * Creates a form.
     *
     * @param mixed The form data
     * @return Form A form
     */
    function createForm($data = null);
}
