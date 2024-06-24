<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        /*Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->integer('number');
        });*/
        $teams = config('permission.teams');
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';


        Schema::create($tableNames['roles'], function (Blueprint $table) use ($teams, $columnNames) {
            $table->bigIncrements('id'); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
            }
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();
            if ($teams || config('permission.testing')) {
                $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });

        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //$table->integer('role_id');
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade'); // Adjusted to reference roles table
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable(); // Adjusted constraint
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
        Schema::create('heads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //$table->integer('role_id');
            //$table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade'); // Adjusted to reference roles table
            $table->string('password');
            $table->rememberToken();
            //$table->foreignId('current_team_id')->nullable(); // Adjusted constraint
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        // Create password_reset_tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Create sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Create roles table


        // Create admins table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        // Create organizations table
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->unique();
            $table->string('location');
            $table->integer('employee_number');
            $table->timestamps();
        });

        // Create responders table
        Schema::create('responders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('organization');
            $table->foreign('organization')->references('organization_name')->on('organizations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('last_activity')->nullable();
            $table->timestamps();
        });

        // Create volunteers table


        // Create emergencies table
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->integer('priority_level');
            $table->timestamps();
        });

        // Create incidents table
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('incident_type');
            $table->foreign('incident_type')->references('type')->on('emergencies')->onDelete('cascade')->onUpdate('cascade');
            $table->string('location');
            $table->timestamp('time_of_incident');
            $table->timestamps();
        });
        Schema::create('deployers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('incident_id')->constrained('incidents')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('incident_id')->references('id')->on('incidents')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // Create deployments table
        Schema::create('deployments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->constrained('incidents')->onDelete('cascade')->onUpdate('cascade');
            $table->string('response_organization');
            $table->foreign('response_organization')->references('organization_name')->on('organizations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('time_responded');
            $table->integer('deployment_force_number');
            $table->timestamps();
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('deployments');
        Schema::dropIfExists('heads');
        Schema::dropIfExists('incidents');
        Schema::dropIfExists('emergencies');
        Schema::dropIfExists('deployers');
        Schema::dropIfExists('responders');
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};

