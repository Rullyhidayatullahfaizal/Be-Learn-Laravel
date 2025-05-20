import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import Selected from "@/Components/Select";
import React, { useState, useEffect } from "react";
import axios from "axios";
export default function Dashboard() {
    
    const [provinces, setProvinces] = useState([]);
    const [cities, setCities] = useState([]);
    const [districts, setDistricts] = useState([]);
    const [villages, setVillages] = useState([]);

    // State for user
    const [selectedProvince, setSelectedProvince] = useState("");
    const [selectedCity, setSelectedCity] = useState("");
    const [selectedDistrict, setSelectedDistrict] = useState("");
    const [selectedVillages, setSelectedVillages] = useState("");

    const [email, setEmail] = useState("");
    const [errorMessage, setErrorMessage] = useState("");
    const [successMessage, setSuccessMessage] = useState("");

    // Fetch Provinces 
    useEffect(() => {
        const fetchProvinces = async () => {
            try {
                const response = await axios.get(
                    "http://localhost:8000/provinces"
                );
                setProvinces(response.data);
            } catch (error) {
                console.error("Error fetching provinces:", error);
            }
        };
        fetchProvinces();
    }, []);

    // Fetch Cities 
    useEffect(() => {
        if (selectedProvince) {
            const fetchCities = async () => {
                try {
                    const response = await axios.get(
                        `http://localhost:8000/regencies?province_id=${selectedProvince}`
                    );
                    setCities(response.data);
                    setDistricts([]);  
                    setVillages([]); 
                } catch (error) {
                    console.error("Error fetching cities:", error);
                }
            };
            fetchCities();
        }
    }, [selectedProvince]);

    // Fetch Districts 
    useEffect(() => {
        if (selectedCity) {
            const fetchDistricts = async () => {
                try {
                    const response = await axios.get(
                        `http://localhost:8000/distrits?regency_id=${selectedCity}`
                    );
                    setDistricts(response.data);
                    console.log(response.data);
                    setVillages([]); 
                } catch (error) {
                    console.error("Error fetching distrits:", error);
                }
            };
            fetchDistricts();
        }
    }, [selectedCity]);

    // Fetch Villages 
    useEffect(() => {
        if (selectedDistrict) {
            const fetchVillages = async () => {
                try {
                    const response = await axios.get(
                        `http://localhost:8000/villages?district_id=${selectedDistrict}`
                    );
                    setVillages(response.data);
                } catch (error) {
                    console.error("Error fetching villages:", error);
                }
            };
            fetchVillages();
        }
    }, [selectedDistrict]);

    // soal no 2

    const validateEmail = (email) => {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailPattern.test(email);
    };

    const handleSubscribe = async (e) => {
        e.preventDefault();
        setErrorMessage("");
        setSuccessMessage("");

        // Validasi input
        if (!email) {
            setErrorMessage("Email harus diisi");
            return;
        }
        if (email.length < 10) {
            setErrorMessage("Email harus lebih dari 10 karakter");
            return;
        }
        if (!validateEmail(email)) {
            setErrorMessage("Email tidak valid");
            return;
        }

        try {
            const response = await axios.post(
                "http://127.0.0.1:8000/subscribe",
                { email }
            );
            setSuccessMessage("Berhasil berlangganan!");
            setEmail("");
        } catch (error) {
            setErrorMessage("Terjadi kesalahan, silakan coba lagi.");
        }
    };
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">StudyCase</div>
                        <div className="p-6 text-gray-900 gap-y-2 grid">
                            <div>
                                <h2 className="font-bold text-center  mb-5 text-2xl">
                                    Soal No 1
                                </h2>
                            </div>
                            {/* Select Province */}
                            <Selected
                                name=" Province"
                                options={provinces}
                                value={selectedProvince}
                                onChange={(e) =>
                                    setSelectedProvince(e.target.value)
                                }
                            />

                            {/* Select City */}
                            <Selected
                                name=" City"
                                options={cities}
                                value={selectedCity}
                                onChange={(e) =>
                                    setSelectedCity(e.target.value)
                                }
                            />

                            {/* Select District */}
                            <Selected
                                name="District"
                                options={districts}
                                value={selectedDistrict}
                                onChange={(e) =>
                                    setSelectedDistrict(e.target.value)
                                }
                            />

                            {/* Select Village */}
                            <Selected
                                name=" Village"
                                options={villages}
                                value={selectedVillages}
                                onChange={(e) =>
                                    setSelectedVillages(e.target.value)
                                }
                            />
                        </div>
                        <hr className="h-px my-8 bg-red-500 border-2 " />
                        <div className="py-2  px-2">
                            <h2 className="font-bold text-center  mb-5 text-2xl">
                                Soal no 2
                            </h2>
                            <div className="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                                <div className="md:flex">
                                    <div className="w-full p-3">
                                        {
                                            "Get The latest insight into property and infrastructure"
                                        }
                                        <div className="relative">
                                            <input
                                                type="email"
                                                className="bg-white h-14 w-full px-4 pr-20 rounded-md focus:outline-none hover:cursor-pointer"
                                                value={email}
                                                onChange={(e) =>
                                                    setEmail(e.target.value)
                                                }
                                                placeholder="email"
                                            />
                                            <PrimaryButton
                                                className="h-10 rounded bg-red-500 absolute top-2 text-sm right-2 px-3 text-white hover:bg-red-700 "
                                                onClick={handleSubscribe}
                                            >
                                                Subscribe Now
                                            </PrimaryButton>{" "}
                                        </div>
                                        {errorMessage && (
                                            <p className="text-red-500 mt-2">
                                                {errorMessage}
                                            </p>
                                        )}
                                        {successMessage && (
                                            <p className="text-green-500 mt-2">
                                                {successMessage}
                                            </p>
                                        )}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </AuthenticatedLayout>
    );
}
