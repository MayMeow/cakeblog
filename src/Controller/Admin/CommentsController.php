<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 */
class CommentsController extends AppController
{
    /**
     * Index method — lists all comments, pending first.
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Comments->find()
            ->contain(['Posts'])
            ->orderBy(['Comments.is_approved' => 'ASC', 'Comments.created' => 'DESC']);

        $comments = $this->paginate($query);

        $this->set(compact('comments'));
    }

    /**
     * Approve a comment.
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function approve($id = null)
    {
        $this->request->allowMethod(['post']);
        $comment = $this->Comments->get($id);
        $comment->is_approved = true;

        if ($this->Comments->save($comment)) {
            $this->Flash->success(__('The comment has been approved.'));
        } else {
            $this->Flash->error(__('The comment could not be approved. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete a comment.
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);

        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
