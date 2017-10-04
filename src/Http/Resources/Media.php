<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:59
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\Media as MediaDomain;

class Media extends Requester
{
    public function add(MediaDomain $media, $item_id)
    {
        return $this->request('POST', '/item/' . $item_id . '/media', (array)$media);
    }

    public function remove($item_id, $media_id)
    {
        return $this->request('DELETE', '/item/' . $item_id . '/media/' . $media_id, []);
    }
}