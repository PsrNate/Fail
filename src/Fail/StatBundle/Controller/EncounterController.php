<?php

namespace Fail\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fail\StatBundle\Entity\Encounter;
use Fail\StatBundle\Form\EncounterType;

/**
 * Encounter controller.
 *
 * @Route("/encounter")
 */
class EncounterController extends Controller
{
    /**
     * Lists all Encounter entities.
     *
     * @Route("/", name="encounter")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('FailStatBundle:Encounter')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Encounter entity.
     *
     * @Route("/{id}/show", name="encounter_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FailStatBundle:Encounter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Encounter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Encounter entity.
     *
     * @Route("/new", name="encounter_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Encounter();
        $form   = $this->createForm(new EncounterType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Encounter entity.
     *
     * @Route("/create", name="encounter_create")
     * @Method("post")
     * @Template("FailStatBundle:Encounter:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Encounter();
        $request = $this->getRequest();
        $form    = $this->createForm(new EncounterType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('encounter_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Encounter entity.
     *
     * @Route("/{id}/edit", name="encounter_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FailStatBundle:Encounter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Encounter entity.');
        }

        $editForm = $this->createForm(new EncounterType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Encounter entity.
     *
     * @Route("/{id}/update", name="encounter_update")
     * @Method("post")
     * @Template("FailStatBundle:Encounter:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FailStatBundle:Encounter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Encounter entity.');
        }

        $editForm   = $this->createForm(new EncounterType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('encounter_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Encounter entity.
     *
     * @Route("/{id}/delete", name="encounter_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('FailStatBundle:Encounter')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Encounter entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('encounter'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
