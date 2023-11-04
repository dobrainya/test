<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

abstract class AbstractController extends Controller
{
    protected function jsonFailure(string $message = ''): Response
    {
        return $this->asJson([
            'success' => false,
            'message' => $message,
        ]);
    }
}
