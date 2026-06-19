<?php

require_once "Pendaftaran.php";

class PendaftaranPrestasi extends Pendaftaran
{
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    public function __construct(
        $id_pendaftaran = null,
        $nama_calon = null,
        $asal_sekolah = null,
        $nilai_ujian = null,
        $biaya_pendaftaran_dasar = null,
        $jenis_prestasi = null,
        $tingkat_prestasi = null
    ) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);

        $this->jenisPrestasi = $jenis_prestasi;
        $this->tingkatPrestasi = $tingkat_prestasi;
    }

    public function getJenisPrestasi()
    {
        return $this->jenisPrestasi;
    }

    public function getTingkatPrestasi()
    {
        return $this->tingkatPrestasi;
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Prestasi - Jenis Prestasi: " . $this->jenisPrestasi . ", Tingkat: " . $this->tingkatPrestasi;
    }

    public function getDaftarPrestasi($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran
WHERE jalur_pendaftaran = 'Prestasi'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $dataPrestasi = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dataPrestasi[] = new PendaftaranPrestasi(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['jenis_prestasi'],
                $row['tingkat_prestasi']
            );
        }

        return $dataPrestasi;
    }
}