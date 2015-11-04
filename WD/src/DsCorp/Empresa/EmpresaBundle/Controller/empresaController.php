<?php

namespace DsCorp\Empresa\EmpresaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Empresa\EmpresaBundle\Entity\empresa;
use DsCorp\Empresa\EmpresaBundle\Form\empresaType;

/**
 * empresa controller.
 *
 */
class empresaController extends Controller
{

    /**
     * Lists all empresa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpresaBundle:empresa')->findAll();

        return $this->render('EmpresaBundle:empresa:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new empresa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new empresa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('empresa_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpresaBundle:empresa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a empresa entity.
     *
     * @param empresa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(empresa $entity)
    {
        $form = $this->createForm(new empresaType(), $entity, array(
            'action' => $this->generateUrl('empresa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new empresa entity.
     *
     */
    public function newAction()
    {
        $entity = new empresa();
        $form   = $this->createCreateForm($entity);

        return $this->render('EmpresaBundle:empresa:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empresa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpresaBundle:empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find empresa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpresaBundle:empresa:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing empresa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpresaBundle:empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find empresa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpresaBundle:empresa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a empresa entity.
    *
    * @param empresa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(empresa $entity)
    {
        $form = $this->createForm(new empresaType(), $entity, array(
            'action' => $this->generateUrl('empresa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing empresa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpresaBundle:empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find empresa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('empresa_edit', array('id' => $id)));
        }

        return $this->render('EmpresaBundle:empresa:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a empresa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpresaBundle:empresa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find empresa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('empresa'));
    }

    /**
     * Creates a form to delete a empresa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empresa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
