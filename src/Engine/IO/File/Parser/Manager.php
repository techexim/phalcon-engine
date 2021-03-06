<?php namespace Engine\IO\File\Parser;

use Engine\IO\File\Contract as File;
use Engine\Exception\IO\InvalidContentException;
use Engine\Engine;

class Manager
{
    protected static $providers = [
        Csv::class => ['csv'],
        Xml::class => ['xml']
    ];
    
    /**
     * Get appropriate parser
     * 
     * @param File $file
     * @return \Engine\IO\File\Parser\Contract
     * @throws InvalidContentException
     */
    public static function getParser(File $file)
    {
        foreach (self::$providers as $provider => $allowedExtensions) {
            if (in_array($file->getExt(), $allowedExtensions)) {
                return Engine::newInstance($provider);
            }
        }
        
        return Engine::newInstance(Factory::class);
    }
}