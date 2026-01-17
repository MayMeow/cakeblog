<?php
declare(strict_types=1);

namespace App\Controller;

use App\View\RssView;
use Cake\View\JsonView;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class, RssView::class];
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $currentBlog = $this->request->getAttribute('currentBlog');

        $query = $this->Posts->find('published')
            ->contain(['Blogs']);

        if ($currentBlog) {
            $query->where(['Posts.blog_id' => $currentBlog]);
            $query->where(['Posts.pinned' => false]);
        } else {
            $query->innerJoinWith('Blogs', function ($q) {
                return $q->where(['Blogs.is_public' => true]);
            });
        }
        
        $posts = $this->paginate($query);

        $this->set(compact('posts'));
        $this->viewBuilder()->setOption('serialize', ['posts']);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, contain: ['Blogs']);
        $this->set(compact('post'));
    }
}
