<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('organizationName')->comment('Наименование ЮЛ\ИП');
            $table->string('inn')->unique()->comment('ИНН');
            $table->string('ogrn')->nullable()->comment('ОГРН или ОГРНИП');
            $table->string('kpp')->nullable()->comment('КПП для ООО');
            $table->string('fullName')->nullable()->comment('ФИО одной строкой');
            $table->string('phoneNumber')->comment('Номер телефона основной');
            $table->string('contactEmail')->nullable();
            $table->string('contractorsPosition')->nullable()->comment('Должность');
            $table->string('extraPhoneNumbers')->nullable()->comment('Доп. номера телефонов');
            $table->string('advCode')->nullable()->comment('Код партнера/тип заявки');
            $table->string('сomment')->nullable()->comment('Комментарий к заявке');
            $table->bigInteger('city_id')->comment('Код города (ФИАС)');
            $table->bigInteger('product_id')->comment('Код продукта');
            $table->string('branchId')->comment('Код отделения');
            $table->string('address')->nullable()->comment('Адрес организации');
            $table->string('email')->nullable()->comment('Email на который уйдет письмо о резерве');
            $table->bigInteger('status_id')->comment('Статус заявки');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
