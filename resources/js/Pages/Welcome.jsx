import React from "react";
import { Head } from "@inertiajs/react";
import Box from "@mui/material/Box";
import { Container } from "@mui/material";
import Navbar from "../Components/NavBar"; // Adjust the path as needed

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <Container className="relative flex min-h-screen flex-col items-center selection:bg-[#FF2D20] selection:text-white">
                    <Box className="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                        <Navbar auth={auth} />
                    </Box>
                </Container>
            </div>
        </>
    );
}
