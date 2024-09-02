<?php
class ApiController extends Controller
{
    // Allow CORS if necessary
    public function beforeAction($action)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *'); // Adjust according to your security needs
        return parent::beforeAction($action);
    }

    // Example action that returns data in JSON format
    public function actionGetPosts()
    {
        // Fetch data from the model
        $posts = Posts::model()->findAll();

        // Convert data to array format
        $result = array();
        foreach ($posts as $post) {
            $result[] = array(
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'category' => $post->category,
                'tags' => $post->tags,
                'created_at' => $post->created_at,
            );
        }

        // Send response as JSON
        echo CJSON::encode($result);
    }

    // Example action that accepts POST data and returns JSON
    public function actionCreatePost()
    {
        $post = new Post();

        // Set attributes from POST data
        if (isset($_POST['Post'])) {
            $post->attributes = $_POST['Post'];
            if ($post->save()) {
                // Send response as JSON
                echo CJSON::encode(array('status' => 'success', 'post_id' => $post->id));
            } else {
                echo CJSON::encode(array('status' => 'error', 'errors' => $post->getErrors()));
            }
        } else {
            echo CJSON::encode(array('status' => 'error', 'message' => 'No data received'));
        }
    }
}
