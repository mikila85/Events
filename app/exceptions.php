<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mike
 * Date: 10/20/13
 * Time: 6:09 PM
 * To change this template use File | Settings | File Templates.
 */

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotFoundException extends NotFoundHttpException {

}

class NotAllowedException extends Exception {}