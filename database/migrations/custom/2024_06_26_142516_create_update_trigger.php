<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUpdateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE OR REPLACE FUNCTION update_updated_at_column()
            RETURNS TRIGGER AS $$
            BEGIN
                NEW.updated_at = NOW();
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        DB::statement('
            CREATE TRIGGER trigger_update_updated_at
            BEFORE UPDATE ON usuarios
            FOR EACH ROW
            EXECUTE FUNCTION update_updated_at_column();
        ');

        DB::statement('
            CREATE INDEX idx_usuarios_cpf ON usuarios(cpf);
        ');

        DB::statement('
            CREATE INDEX idx_usuarios_email ON usuarios(email);
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS trigger_update_updated_at ON usuarios');
        DB::statement('DROP FUNCTION IF EXISTS update_updated_at_column');
        DB::statement('DROP INDEX IF EXISTS idx_usuarios_cpf');
        DB::statement('DROP INDEX IF EXISTS idx_usuarios_email');
    }
}
