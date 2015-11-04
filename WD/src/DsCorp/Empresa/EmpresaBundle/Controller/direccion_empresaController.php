<?php

namespace DsCorp\Empresa\EmpresaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Empresa\EmpresaBundle\Entity\direccion_empresa;
use DsCorp\Empresa\EmpresaBundle\Form\direccion_empresaType;

/**
 * direccion_empresa controller.
 *
 */
class direccion_empresaController extends Controller
{

    /**
     * Lists all direccion_empresa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpresaBundle:direccion_empresa')->findAll();

        return $this->render('EmpresaBundle:direccion_empresa:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new direccion_empresa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new direccion_empresa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_empresa_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpresaBundle:direccion_empresa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a direccion_empresa entity.
     *
     * @param direccion_empresa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(direccion_empresa $entity)
    {
        $form = $this->createForm(new direccion_empresaType(), $entity, array(
            'action' => $this->generateUrl('direccion_empresa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new direccion_empresa entity.
     *
     */
    public function newAction()
    {
        $entity = new direccion_empresa();
        $form   = $this->createCreateForm($entity);

        return $this->render('EmpresaBundle:direccion_empresa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a direccion_empresa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpresaBundle:direccion_empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_empresa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpresaBundle:direccion_empresa:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing direccion_empresa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpresaBundle:direccion_empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_empresa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpresaBundle:direccion_empresa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a direccion_empresa entity.
    *
    * @param direccion_empresa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(direccion_empresa $entity)
    {
        $form = $this->createForm(new direccion_empresaType(), $entity, array(
            'action' => $this->generateUrl('direccion_empresa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing direccion_empresa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpresaBundle:direccion_empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion_empresa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_empresa_edit', array('id' => $id)));
        }

        return $this->render('EmpresaBundle:direccion_empresa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a direccion_empresa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpresaBundle:direccion_empresa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find direccion_empresa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direccion_empresa'));
    }

    /**
     * Creates a form to delete a direccion_empresa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_empresa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
