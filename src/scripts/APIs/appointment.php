<?php

    require_once "../../db/connect.php";
    include_once "../../scripts/services/appointmentService.php";

    include "../../scripts/utils/validation-data.php";

    $mysqli->select_db("docwebox");
    
    $appointmentService = new AppointmentService("appointment", $mysqli);
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $data = null;

        if (count($_GET) == 0) {
            $data = $appointmentService->findAllAppointments();
        }

        if(isset($_GET["doctor_id"])){
            $doctor_id = validate_data($_GET['doctor_id']);
            $data = $appointmentService->findDoctorAppointments($doctor_id);
        }

        if(isset($_GET["patient_id"])){
            $patient_id = validate_data($_GET['patient_id']);
            $data = $appointmentService->findPatientAppointments($patient_id);       
        }

        if(isset($_GET["date"])){
            $date = validate_data($_GET['date']);
            $data = $appointmentService->findAppointmentsByDate($date);       
        }
        
        header("Content-Type: application/json");
        
        echo json_encode($data);
        
    }else if($_SERVER['REQUEST_METHOD'] == "POST"){
        $data = null;

        $entityBody = file_get_contents('php://input');

        $appointentBody = json_decode($entityBody);

        $appointment = new Appointment(null, $appointentBody->doctor_id, $appointentBody->patient_id, $appointentBody->date, $appointentBody->time, $appointentBody->description, null); 

        $appointmentService->addAppointment($appointment);

        echo json_encode($appointment);
        
    }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $body = file_get_contents('php://input');
    
        $appointment = json_decode($body);

        if ($appointment->id && $appointment->patientid){
            $appointmentService->deleteAppointment($appointment->id, $appointment->patientid);
        }
    } else if ($_SERVER['REQUEST_METHOD'] == "PUT"){

        //Data will pass into body in json format
        $appointmentBody = file_get_contents('php://input');
        
        $appointmentProvided = json_decode($appointmentBody);
        
        $data = $appointmentService->updateAppointmentInfo($appointmentProvided);
        
        header("Content-Type: application/json");

        echo json_encode($data);
    }

    $mysqli->close();
?>