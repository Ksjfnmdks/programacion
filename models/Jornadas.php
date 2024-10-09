<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_jornadas".
 *
 * @property int $jor_id
 * @property string $descripcion
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $fecha_creacion
 *
 * @property TblFichas[] $tblFichas
 */
class Jornadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jornadas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'hora_inicio', 'hora_fin'], 'required'],
            [['descripcion'], 'string', 'max' => 100],
            [['hora_inicio', 'hora_fin'], 'string', 'max' => 30],
            [['hora_inicio', 'hora_fin'], 'validarHoras'],  // Validar que la hora de inicio no sea mayor que la hora final
            [['hora_inicio', 'hora_fin'], 'validateDuracion'],  // Validar la duración de la jornada
            [['hora_inicio', 'hora_fin'], 'validateMaxhoras'],  // Validar que una jornada no dure mas de 6 horas
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jor_id' => 'Jor ID',
            'descripcion' => 'Descripcion',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Validación personalizada para la duración de la jornada.
     */
    public function validateDuracion($attribute, $params)
    {
        // Convertimos las horas de inicio y fin a objetos de tipo DateTime
        $hora_inicio = strtotime($this->hora_inicio);
        $hora_fin = strtotime($this->hora_fin);

        // Verificamos si las conversiones fueron exitosas
        if ($hora_inicio === false || $hora_fin === false) {
            $this->addError($attribute, 'El formato de hora es incorrecto.');
            return;
        }

        // Calculamos la diferencia en horas
        $diferencia_horas = ($hora_fin - $hora_inicio) / 3600; // Convertimos la diferencia en segundos a horas

        // Validamos si la jornada dura menos de 3 horas
        if ($diferencia_horas < 3) {
            $this->addError($attribute, 'La jornada debe durar al menos 3 horas.');
        }
    }

    /**
     * Método para establecer la fecha y hora actuales
     */
    public function setCurrentDateTime()
    {
        $this->fecha_hora_oculta = date('Y-m-d H:i:s');
    }

    // Método para validar las horas
    public function validarHoras($attribute, $params)
    {
        if (strtotime($this->hora_inicio) > strtotime($this->hora_fin)) {
            $this->addError($attribute, 'La hora de inicio no puede ser mayor que la hora final.');
        }
    }


    /* Validación personalizada para la duración de la jornada.
    */
   public function validateMaxhoras($attribute, $params)
   {
       // Convertimos las horas de inicio y fin a objetos de tipo DateTime
        $hora_inicio = strtotime($this->hora_inicio);
        $hora_fin = strtotime($this->hora_fin);

       // Verificamos si las conversiones fueron exitosas
        if ($hora_inicio === false || $hora_fin === false) {
            $this->addError($attribute, 'El formato de hora es incorrecto.');
            return;
       }

       // Calculamos la diferencia en horas
       $diferencia_horas = ($hora_fin - $hora_inicio) / 3600; // Convertimos la diferencia en segundos a horas

       // Validamos si la jornada dura menos de 6 horas
        if ($diferencia_horas > 6) {
            $this->addError($attribute, 'Una jornada no puede durar mas de 6 horas.');
        }
   }
    

}
