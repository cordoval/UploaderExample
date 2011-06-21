<?php

namespace Cordova\UploaderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cordova\UploaderBundle\Entity\SignedDocument;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    public function indexAction()
    {
	$form = $this->get('cordova_uploader.form_factory.signeddocument')->createForm();

        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {

            $form->bindRequest($request);

            $dir = '../media/reception/';

            if($form->isValid()) {

                $signeddocument = $form->getData();

                $uploadedfile = $signeddocument->getAttachment();
                $uploadedfile->move($dir, 'signeddoc.doc');

                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($signeddocument);
                $em->flush();

                //reset the form
                $form->setData(new SignedDocument());
            }
        }

        return $this->render(
            'CordovaUploaderBundle:Default:index.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
}
