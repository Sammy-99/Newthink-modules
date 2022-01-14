<?php
namespace Bluethink\HelloWorld\Model\Api;
use Psr\Log\LoggerInterface;
class Custom
{
    protected $logger;
    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }
    /**
     * @inheritdoc
     */
    public function getPost($param)
    {
        $response = ['success' => false];
        try {
            // Your Code here
            $response = ['success' => true, 'message' => $param];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response, JSON_PRETTY_PRINT);
        return $returnArray; 
   }
}