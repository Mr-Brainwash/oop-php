<?php

namespace app\controllers;

use app\models\Feedback;

class FeedbackController extends BaseController
{
    public function actionIndex()
    {
        $feedback = Feedback::getAll();
        echo $this->render('feedback', [
            'feedback' => $feedback
        ]);
    }
}