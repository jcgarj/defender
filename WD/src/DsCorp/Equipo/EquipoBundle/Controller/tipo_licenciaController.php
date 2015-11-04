<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\tipo_licencia;
use DsCorp\Equipo\EquipoBundle\Form\tipo_licenciaType;

/**
 * tipo_licencia controller.
 *
 */
class tipo_licenciaController extends Controller
{

    /**
     * Lists all tipo_licencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:tipo_licencia')->findAll();

        return $this->render('EquipoBundle:tipo_licencia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new tipo_licencia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new tipo_licencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipo_licencia_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:tipo_licencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a tipo_licencia entity.
     *
     * @param tipo_licencia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(tipo_licencia $entity)
    {
        $form = $this->createForm(new tipo_licenciaType(), $entity, array(
            'action' => $this->generateUrl('tipo_licencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new tipo_licencia entity.
     *
     */
    public function newAction()
    {
        $entity = new tipo_licencia();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:tipo_licencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipo_licencia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:tipo_licencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tipo_licencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:tipo_licencia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipo_licencia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:tipo_licencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tipo_licencia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:tipo_licencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a tipo_licencia entity.
    *
    * @param tipo_licencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(tipo_licencia $entity)
    {
        $form = $this->createForm(new tipo_licenciaType(), $entity, array(
            'action' => $this->generateUrl('tipo_licencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing tipo_licencia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:tipo_licencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tipo_licencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipo_licencia_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:tipo_licencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a tipo_licencia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:tipo_licencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find tipo_licencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipo_licencia'));
    }

    /**
     * Creates a form to delete a tipo_licencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipo_licencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
