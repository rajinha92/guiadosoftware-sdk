<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:37
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;

class User extends Requester
{
    public function bootgrid($start, $length, $search, array $order)
    {
        return $this->request('GET', '/user/bootgrid', compact('start', 'length', 'search', 'order'));
    }
}