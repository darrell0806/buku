<?php namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'book_id', 'comment','created_at'];

    public function getCommentsByPost($postId)
    {
        // Menggunakan Query Builder untuk melakukan JOIN dengan tabel user
        return $this->select('comments.*, user.username')
                    ->join('user', 'user.id_user = comments.user_id')
                    ->where('comments.book_id', $postId)
                    ->findAll();
    }
    public function addComment($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->insert($data);
    }
}
