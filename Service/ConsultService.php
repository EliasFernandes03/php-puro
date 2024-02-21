<?php

use DI\Container;

class ConsultService {
    private $consultRepository;

    public function __construct(Container $container) {
        $this->consultRepository = new ConsultRepository($container);
    }
    public function getAllConsults() {
        return $this->consultRepository->getAllConsults();
    }

    public function getConsultById($id) {
        return $this->consultRepository->getConsultById($id);
    }

    public function addConsult($user_id, $date) {
        return $this->consultRepository->addConsult($user_id, $date);
    }

    public function updateConsult($id, $user_id, $date) {
        return $this->consultRepository->updateConsult($id, $user_id, $date);
    }

    public function deleteConsult($id) {
        return $this->consultRepository->deleteConsult($id);
    }
}