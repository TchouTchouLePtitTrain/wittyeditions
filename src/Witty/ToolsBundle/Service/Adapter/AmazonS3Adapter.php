<?php

namespace Witty\ToolsBundle\Service\Adapter;

use Gaufrette\Adapter\AmazonS3 as BaseAdapter;
use Symfony\Component\HttpFoundation\File\File as File;

class AmazonS3Adapter extends BaseAdapter
{
	/*
	* Copie le fichier donné dans le folder donné du bucket Amazon S3
	*
	*
	*/
	public function moveFile(File $file, $folder = "", $filename = "")
	{
        $response = $this->service->create_object(
			$this->bucket, 
			$folder.($folder? '/' : "").(($filename)? $filename : $file->getFilename()), 
			array(
				'acl' => \AmazonS3::ACL_OPEN, 
				'fileUpload' => $file
				)
		);

        if (404 === $response->status) {
            throw new Exception\FileNotFound($sourceKey);
        } elseif (!$response->isOK()) {
            throw new \RuntimeException(sprintf(
                'Could not rename the "%s" file into "%s".',
                $sourceKey,
                $targetKey
            ));
        }
		
		return $response->isOK();
	}
}