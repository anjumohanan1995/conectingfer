<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            // Drop the existing index
            $table->dropIndex('personal_access_tokens_tokenable_type_tokenable_id_index');
            
            // Create a new index with specified key length
            $table->index(['tokenable_type', 'tokenable_id'], 'personal_access_tokens_tokenable_index', 'my');

            // In case you're using MySQL < 5.7.7 or MariaDB < 10.2.2
            // $table->index(['tokenable_type', 'tokenable_id'], 'personal_access_tokens_tokenable_index', 'btree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            // Drop the new index
            $table->dropIndex('personal_access_tokens_tokenable_index');
            
            // Recreate the old index
            $table->index(['tokenable_type', 'tokenable_id'], 'personal_access_tokens_tokenable_type_tokenable_id_index');
        });
    }
}


