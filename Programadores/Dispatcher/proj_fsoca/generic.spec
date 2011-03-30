%define release 1
%define _prefix /usr

Summary: Aplicacao John Doe
Name: %{name}
Version: %{version}
Release: %{release}
Epoch: 2
License: Open-source...
Group: Applications/System
Source0: source.z


BuildRoot: %{_tmppath}/%{name}-root

%description

Descricao do software.

%prep
%setup -q

%build
%configure
make

%install
[ "$RPM_BUILD_ROOT" != "/" ] && rm -rf $RPM_BUILD_ROOT
make install DESTDIR=$RPM_BUILD_ROOT

%clean
[ "$RPM_BUILD_ROOT" != "/" ] && rm -rf $RPM_BUILD_ROOT



