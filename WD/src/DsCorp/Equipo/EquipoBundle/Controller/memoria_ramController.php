<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\memoria_ram;
use DsCorp\Equipo\EquipoBundle\Form\memoria_ramType;

/**
 * memoria_ram controller.
 *
 */
class memoria_ramController extends Controller
{

    /**
     * Lists all memoria_ram entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:memoria_ram')->findAll();

        return $this->render('EquipoBundle:memoria_ram:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new memoria_ram entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new memoria_ram();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('memoria_ram_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:memoria_ram:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a memoria_ram entity.
     *
     * @param memoria_ram $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(memoria_ram $entity)
    {
        $form = $this->createForm(new memoria_ramType(), $entity, array(
            'action' => $this->generateUrl('memoria_ram_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new memoria_ram entity.
     *
     */
    public function newAction()
    {
        $entity = new memoria_ram();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:memoria_ram:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memoria_ram entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:memoria_ram')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find memoria_ram entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:memoria_ram:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing memoria_ram entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:memoria_ram')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find memoria_ram entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:memoria_ram:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a memoria_ram entity.
    *
    * @param memoria_ram $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(memoria_ram $entity)
    {
        $form = $this->createForm(new memoria_ramType(), $entity, array(
            'action' => $this->generateUrl('memoria_ram_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing memoria_ram entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:memoria_ram')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find memoria_ram entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('memoria_ram_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:memoria_ram:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a memoria_ram entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:memoria_ram')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find memoria_ram entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('memoria_ram'));
    }

    /**
     * Creates a form to delete a memoria_ram entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memoria_ram_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
