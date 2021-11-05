<?php

namespace app\controllers;

use app\models\Feedback;
use app\models\repositories\FeedbackRepository;

class FeedbackController extends BaseController
{
    public function actionIndex()
    {
        $feedback = (new FeedbackRepository())->getAll();
        echo $this->render('feedback', [
            'feedback' => $feedback
        ]);
    }
}