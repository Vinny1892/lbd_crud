<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
             create or replace function log() RETURNS TRIGGER as $$
                    begin
                      INSERT INTO log (registro_novo,registro_antigo,tabela,operacao,data_alteracao)
                      VALUES(to_jsonb(NEW) , to_jsonb(OLD) , TG_RELNAME ,TG_OP, current_timestamp);
                      IF TG_OP = 'DELETE' then
                        RETURN OLD;
                      else
                        RETURN NEW;
                      END IF;
                    end;
              $$ LANGUAGE PLPGSQL;

              create trigger departamento_log before INSERT OR UPDATE OR DELETE on departamento for each row execute procedure log();
              create trigger funcionario_log before INSERT OR UPDATE OR DELETE on funcionario for each row execute procedure log();
              create trigger setor_log before INSERT OR UPDATE  OR DELETE on setor for each row execute procedure log();
              create trigger projeto_log before INSERT OR UPDATE OR DELETE on projeto for each row execute procedure log();
              create trigger dependente_log before INSERT OR UPDATE OR DELETE on dependente for each row execute procedure log();

        ");
    }


}
