<?php


namespace SergioDaniloJr\Zipper;


/**
 * Class Zipper
 * @package SergioDaniloJr\Zipper
 */
class Zipper
{
    /**
     * @var \ZipArchive
     */
    private $zip;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $message;

    /**
     *Default Extension
     */
    const DEFAULT_EXTENSION = "zip";

    /**
     * Zipper constructor.
     * @param string|null $pathSave
     */
    public function __construct(string $pathSave = null)
    {
        $this->zip = new \ZipArchive();
        $this->path = $pathSave;
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function file()
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return string|null
     */
    public function zipFile(string $file): ?string
    {
        if (!is_null($dataFile = $this->dataFile($file))) {

            $path = $this->destiny($file);
            $this->zip = new \ZipArchive();
            if ($this->zip->open($path, $this->zip::CREATE) === true) {
                $bool = $this->zip->addFile($file, $dataFile->basename);
                $this->zip->close();
            }

            if (isset($bool) && $bool === true) {
                $this->file = $path;
                return $this->file;
            }

        } else {
            $this->message = "Algo deu errado ao Zipar!";
            return null;
        }
    }


    /**
     * @param array $files
     * @param string $nameFile
     * @param string|null $path
     * @return string|null
     */
    public function zipFiles(array $files, string $nameFile, string $path = null): ?string
    {
        $path = (!is_null($this->path) ? $this->path : $path);
        if (!$path) {
            $this->message = "Forneça um Caminho para Salvar o Arquivo!";
            return null;
        }

        $nameFile = $nameFile . "." . self::DEFAULT_EXTENSION;
        $pathSave = $this->checkDir($path) . "/" . $nameFile;

        if (!empty($files) && is_array($files) && $this->zip->open($pathSave, $this->zip::CREATE) === true) {
            foreach ($files as $file) {
                if ($dataFile = $this->dataFile($file)) {
                    $this->zip->addFile($file, $dataFile->basename);
                } else {
                    return null;
                }
            }
            $this->zip->close();
        }

        $this->file = $pathSave;
        return $this->file();
    }

    /**
     * @param string $file
     * @param string|null $destiny
     * @return string|null
     */
    public function extract(string $file, string $destiny = null): ?string
    {
        if (!is_null($dataFile = $this->dataFile($file))) {

            $destiny = (!is_null($destiny) ? $destiny : $dataFile->dirname);

            if ($this->zip->open($file) === TRUE) {
                $this->zip->extractTo($destiny);
                $this->zip->close();
            }
            $saved = $destiny . "/" . $dataFile->basename;
            return $this->checkDir($saved);
        }

        return null;
    }

    /**
     * @param $path
     * @return bool
     */
    public function download($path): bool
    {
        $fileZip = $this->zipFile($path);

        if (file_exists($fileZip) && !is_dir($fileZip) && !is_null($fileZip)) {
            $fileName = pathinfo($fileZip)["basename"];
            header("Content-Type: application/zip");
            header('Content-Length:' . filesize($fileZip));
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            readfile($fileZip);
            unlink($fileZip);
            return true;
        }
        return false;
    }


    /**
     * @param string $path
     * @return object|null
     */
    private function dataFile(string $path): ?object
    {
        if (!is_file($path)) {
            $this->message = "Forneça um Arquivo Válido!";
            return null;
        } else {
            $pathinfo = pathinfo($path);
            $dataFile = new \stdClass();
            $dataFile->dirname = $pathinfo["dirname"];
            $dataFile->basename = $pathinfo["basename"];
            $dataFile->extension = $pathinfo["extension"];
            $dataFile->filename = $pathinfo["filename"];

            return $dataFile;
        }
    }


    /**
     * @param string $file
     * @return string
     */
    private function destiny(string $file): string
    {
        if (!is_null($dataFile = $this->dataFile($file)) && !is_null($this->path)) {
            $pathSave = $this->checkDir($this->path) . "/" . $this->setFileName($file) . "." . self::DEFAULT_EXTENSION;
        } else {
            $pathSave = $dataFile->dirname . "/" . $this->setFileName($file) . "." . self::DEFAULT_EXTENSION;
        }
        $this->path = $pathSave;
        return $this->path;
    }

    /**
     * @param $file
     * @return string
     */
    public function setFileName($file): string
    {
        $dataFile = $this->dataFile($file);
        $filename = $this->dataFile($file)->filename . "-" . (string)time();
        return $filename;
    }

    /**
     * @param string $path
     * @return string|null
     */
    private function checkDir(string $path): ?string
    {
        if (is_dir($path)) {
            $this->path = $path;
            return $this->path;
        }
        //Caso a Pasta não exista, tem que criar um método para criar a pasta solicitada
        return $this->setDir($path);
    }


    /**
     * @param string $path
     * @return string
     */
    private function setDir(string $path): string
    {
        if (!is_dir($path) && !is_file($path)) {
            mkdir($path, 777, true);
        }
        $this->path = $path;
        return $this->path;
    }
}