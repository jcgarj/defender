<?php

namespace DsCorp\General\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\General\GeneralBundle\Entity\estatus;
use DsCorp\General\GeneralBundle\Form\estatusType;

/**
 * estatus controller.
 *
 */
class estatusController extends Controller
{

    /**
     * Lists all estatus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GeneralBundle:estatus')->findAll();

        return $this->render('GeneralBundle:estatus:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new estatus entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new estatus();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estatus_show', array('id' => $entity->getId())));
        }

        return $this->render('GeneralBundle:estatus:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a estatus entity.
     *
     * @param estatus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(estatus $entity)
    {
        $form = $this->createForm(new estatusType(), $entity, array(
            'action' => $this->generateUrl('estatus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new estatus entity.
     *
     */
    public function newAction()
    {
        $entity = new estatus();
        $form   = $this->createCreateForm($entity);

        return $this->render('GeneralBundle:estatus:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estatus entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:estatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find estatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:estatus:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estatus entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:estatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find estatus entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:estatus:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a estatus entity.
    *
    * @param estatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(estatus $entity)
    {
        $form = $this->createForm(new estatusType(), $entity, array(
            'action' => $this->generateUrl('estatus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing estatus entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:estatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find estatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estatus_edit', array('id' => $id)));
        }

        return $this->render('GeneralBundle:estatus:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a estatus entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GeneralBundle:estatus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find estatus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estatus'));
    }

    /**
     * Creates a form to delete a estatus entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estatus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
