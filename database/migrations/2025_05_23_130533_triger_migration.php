<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Create the trigger for after insert on pkls
        DB::unprepared('
            CREATE TRIGGER after_pkl_insert
            AFTER INSERT ON pkls
            FOR EACH ROW
            BEGIN
                UPDATE siswas
                SET status_lapor_pkl = TRUE
                WHERE id = NEW.siswa_id;
            END;
        ');

        // Create the trigger for after delete on pkls
        DB::unprepared('
            CREATE TRIGGER after_pkl_delete
            AFTER DELETE ON pkls
            FOR EACH ROW
            BEGIN
                DECLARE pki_count INT;
                SELECT COUNT(*) INTO pki_count
                FROM pkls
                WHERE siswa_id = OLD.siswa_id;
                IF pki_count = 0 THEN
                    UPDATE siswas
                    SET status_lapor_pkl = FALSE
                    WHERE id = OLD.siswa_id;
                END IF;
            END;
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_pkl_insert;');
        DB::unprepared('DROP TRIGGER IF EXISTS after_pkl_delete;');
    }
};
