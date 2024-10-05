import * as React from 'react';
import PropTypes from 'prop-types';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import { createTheme } from '@mui/material/styles';
import DashboardIcon from '@mui/icons-material/Dashboard';
import { AppProvider } from '@toolpad/core/AppProvider';
import { DashboardLayout } from '@toolpad/core/DashboardLayout';
import axios from 'axios';
import { useState, useEffect, useMemo } from 'react';

const NAVIGATION = [
  {
    segment: 'dashboard',
    title: 'Dashboard',
    icon: <DashboardIcon />,
  },
  {
    segment: 'income',
    title: 'Another Page',
    icon: <DashboardIcon />,
  },
];

const demoTheme = createTheme({
  cssVariables: {
    colorSchemeSelector: 'data-toolpad-color-scheme',
  },
  colorSchemes: { light: true, dark: true },
  breakpoints: {
    values: {
      xs: 0,
      sm: 600,
      md: 600,
      lg: 1200,
      xl: 1536,
    },
  },
});


const handleLogout = async () => {
  const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
  if (!token) {
    console.error("CSRF token is not available");
    return;
  }

  try {
    await axios.post('/logout', {}, {
      headers: {
        'X-CSRF-TOKEN': token,
      },
    });
    window.location.href = '/'; 
  } catch (error) {
    console.error('Logout error:', error.response.data);
  }
};


function DemoPageContent({ pathname }) {
  return (
    <Box
      sx={{
        py: 4,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        textAlign: 'center',
      }}
    >
      <Typography>Dashboard content for {pathname}</Typography>
    </Box>
  );
}

DemoPageContent.propTypes = {
  pathname: PropTypes.string.isRequired,
};


function AuthenticatedLayout(props) {
  const { window, auth  } = props; 

  const [session, setSession] = useState({
    user: {
      name: auth?.user?.name || 'User', 
      email: auth?.user?.email || 'user@example.com', 
      image: 'https://avatars.githubusercontent.com/u/19550456', 
    },
  });

 
  useEffect(() => {
    if (auth) {
      setSession({
        user: {
          name: auth.user?.name || 'User',
          email: auth.user?.email || 'user@example.com',
          image: 'https://avatars.githubusercontent.com/u/19550456',
        },
      });
    }
  }, [auth]);

  const authentication = useMemo(() => {
    return {
      signOut: () => {
        setSession(null); // Clear session on logout
        handleLogout(); // Perform the logout action
      },
    };
  }, []);

  const [pathname, setPathname] = useState('/dashboard');

  const router = useMemo(() => {
    return {
      pathname,
      searchParams: new URLSearchParams(),
      navigate: (path) => setPathname(String(path)),
    };
  }, [pathname]);

  const demoWindow = window !== undefined ? window() : undefined;

  return (
    <AppProvider
      session={session}
      authentication={authentication}
      navigation={NAVIGATION}
      router={router}
      theme={demoTheme}
      window={demoWindow}
    >
      <DashboardLayout>
        <DemoPageContent pathname={pathname} signOut={authentication.signOut} />
      </DashboardLayout>
    </AppProvider>
  );
}

AuthenticatedLayout.propTypes = {
    window: PropTypes.func,
    auth: PropTypes.shape({
      user: PropTypes.shape({
        name: PropTypes.string,
        email: PropTypes.string,
      }),
    }).isRequired,
  };

export default AuthenticatedLayout;
