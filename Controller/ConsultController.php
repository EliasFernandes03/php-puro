<?php 

use DI\Container;

class ConsultController {
    private $consultService;

    public function __construct(ConsultService $consultService) {
        $this->consultService = $consultService;
    }

    public function getAllConsults() {
        return $this->consultService->getAllConsults();
    }

    public function getConsultById($id) {
        return $this->consultService->getConsultById($id);
    }

    public function addConsult($user_id, $date) {
        return $this->consultService->addConsult($user_id, $date);
    }

    public function updateConsult($id, $user_id, $date) {
        return $this->consultService->updateConsult($id, $user_id, $date);
    }

    public function deleteConsult($id) {
        return $this->consultService->deleteConsult($id);
    }
}