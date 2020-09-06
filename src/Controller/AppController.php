<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Utility\Xml;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
            // 'listeners' => [
            //     'Crud.Api',
            //     'Crud.ApiPagination',
            //     'Crud.ApiQueryLog'
            // ]
            'listeners' => [
                'CrudJsonApi.JsonApi',
                'CrudJsonApi.Pagination', // Pagination != ApiPagination
                'Crud.ApiQueryLog'
            ]
        ]);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }



    /**
     * Execute to manage if will redirect when is not xml or json and is success.
     *
     * @param string|null $message to show.
     * @param bool check if is success or error.
     * @param string|null Model name to associate in array to set in xml, json or in form.
     * @param class|null Model to show in xml, json or in form.
     * @param bool $changeData Check if is changing data. If changing will set ($this->set([...])).
     */
    protected function result($message, $isSuccess, $modelName, $model, $changeData)
    {
        if (RESPONSE == 'HTML') {
            if ($changeData) {
                // redirect only if is web (form) and is success
                if (!$this->request->is(['xml', 'json'])) {
                    if ($isSuccess) {
                        $this->Flash->success(__($message));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__($message));
                    }
                }
            }

            $this->set([
                $modelName => $model,
                '_serialize' => $changeData ? [$modelName, 'message'] : [$modelName]
            ]);
        } elseif (RESPONSE == 'JSON') {
            if ($message) $res['message'] = $message;
            if ($isSuccess !== null) $res['success'] = $isSuccess ? 1 : 0;
            $res['data'] = $model;
            return $this->response->withStringBody(json_encode($res));
        }
    }
}
