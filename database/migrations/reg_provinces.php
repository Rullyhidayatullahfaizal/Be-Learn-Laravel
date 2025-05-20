public function up()
{
    Schema::create('reg_provinces', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
