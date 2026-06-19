<?php

require_once "Pendaftaran.php";

class PendaftaranReguler extends Pendaftaran
{
    protected $pilihanProdi;
    protected $lokasiKampus;

    public function __construct(
        $id_pendaftaran = null,
        $nama_calon = null,
        $asal_sekolah = null,
        $nilai_ujian = null,
        $biaya_pendaftaran_dasar = null,
        $pilihan_prodi = null,
        $lokasi_kampus = null
    ) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);

        $this->pilihanProdi = $pilihan_prodi;
        $this->lokasiKampus = $lokasi_kampus;
    }

    public function getPilihanProdi()
    {
        return $this->pilihanProdi;
    }

    public function getLokasiKampus()
    {
        return $this->lokasiKampus;
    }

    // Override method hitungTotalBiaya() dari class Pendaftaran
    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Reguler - Prodi: " . $this->pilihanProdi . ", Lokasi Kampus: " . $this->lokasiKampus;
    }

    public function getDaftarReguler($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran
WHERE jalur_pendaftaran = 'Reguler'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $dataReguler = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dataReguler[] = new PendaftaranReguler(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['lokasi_kampus']
            );
        }

        return $dataReguler;
    }
}