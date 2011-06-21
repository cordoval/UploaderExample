<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 12:53 AM
 *
 */

namespace Cordova\UploaderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SignedDocument.
 *
 * @ORM\Entity
 * @ORM\Table(name="cb_signeddocument")
 *
 */
class SignedDocument
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="255")
     *
     * @Assert\NotBlank(message="Please enter filename", groups="CreateSignedDocument")
     * @Assert\MaxLength(limit="255", message="Try shortening filename", groups="CreateSignedDocument")
     *
     * @var string $filename
     */
    protected $filename;

    /**
     * @ORM\Column(type="string", length="255", nullable=true)
     *
     * @var string $filepath
     */
    protected $filepath;

    /**
     * @Assert\File(maxSize="70000000")
     *
     * @var File $attachment
     */
    public $attachment;

    public function getAttachment()
    {
        return $this->attachment;
    }

    public function getFullPath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->filepath;
    }

    public function getUploadRootDir()
    {
        return '~/media_uploaded';
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set filename
     *
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get filename
     *
     * @return string $filename
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set filepath
     *
     * @param string $filepath
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * Get filepath
     *
     * @return string $filepath
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

}
