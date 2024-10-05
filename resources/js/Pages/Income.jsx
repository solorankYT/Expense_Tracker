import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Container } from "@mui/material";

export default function Income({ auth }) {
    return (
        <>
        <AuthenticatedLayout>
        <Container>
            <p>hello</p>
        </Container>
        </AuthenticatedLayout>
        </>
    );
}
